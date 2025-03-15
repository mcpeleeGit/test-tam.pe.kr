<?php
require('api/service/botService.php');

class botController
{
    public function defaultMethod()
    {
        $BotService = new botService();
        $BotService->getData();
    }
}
