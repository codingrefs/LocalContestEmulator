<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

abstract class AbstractEmailTemplateNotification extends Notification
{
    protected string $templateName;

    abstract protected function getPlaceholders(): array;
}
