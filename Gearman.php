<?php

class Gearman extends CApplicationComponent
{

    public $servers;
    protected $client;
    protected $worker;

    public function init()
    {
        parent::init();
    }

    protected function setServers($instance)
    {
        foreach ($this->servers as $s)
        {
            $instance->addServer($s['host'], $s['port']);
        }

        return $instance;
    }

    public function client()
    {
        if (!$this->client)
        {
            $this->client = $this->setServers(new GearmanClient());
        }

        return $this->client;
    }

    public function worker()
    {
        if (!$this->worker)
        {
            $this->worker = $this->setServers(new GearmanWorker());
        }

        return $this->worker;
    }

}
