<?php

class ShiftDataInstance
{
    public string $employeeCount;
    public string $clientCount;
    public string $services;
    public string $daystart;
    public string $dayend;

    /**
     * @param string $employeeCount
     * @param string $clientCount
     * @param string $services
     * @param string $daystart
     * @param string $dayend
     */
    public function __construct(string $employeeCount,
                                string $clientCount,
                                string $services,
                                string $daystart,
                                string $dayend)
    {
        $this->employeeCount = $employeeCount;
        $this->clientCount = $clientCount;
        $this->services = $services;
        $this->daystart = $daystart;
        $this->dayend = $dayend;
    }
}
