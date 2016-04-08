<?php

class OC_CLI {
    protected $event;
    protected $registry;

    public function __construct($registry) {
        if (!$this->isActive()) {
            $this->echo_invalid_request();
        }

        $this->registry = $registry;
        $this->event = $registry->get('event');
    }

    public function isActive() {
        return defined('OPENCART_CLI_MODE') && OPENCART_CLI_MODE === TRUE;
    }

    public function router() {
        global $argv;

        if (empty($argv[2]) || $argv[2] == 'oc_cli/router') {
            $route = 'common/oc_cli';
        } else {
            $route = str_replace('../', '', (string)$argv[2]);
        }

        // Trigger the pre events
        $result = $this->event->trigger('controller/' . $route . '/before', array(&$route, &$data));
        
        if (!is_null($result)) {
            return $result;
        }
        
        // We dont want to use the loader class as it would make an controller callable.
        $action = new Action($route);
        
        // Any output needs to be another Action object.
        $output = $action->execute($this->registry); 
        
        // Trigger the post events
        $result = $this->event->trigger('controller/' . $route . '/after', array(&$route, &$data, &$output));
        
        if (!is_null($result)) {
            return $result;
        }
        
        return $output;
    }

    public function echo_invalid_request() {
        oc_cli_output("Invalid request!", 1);
    }

    public function echo_not_found() {
        oc_cli_output("Route not found!", 1);
    }

    public function echo_welcome_message() {
        oc_cli_output("This is the OpenCart CLI mode.");
    }
}