<?php
namespace Siegelion\Service\Payment;

interface PaymentInterface
{
    public function prepay();
    public function getPrepayError();
    public function handlePaymentResult(callable $callback);
}