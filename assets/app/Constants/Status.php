<?php

namespace App\Constants;

class Status
{

    const ENABLE  = 1;
    const DISABLE = 0;

    const YES = 1;
    const NO  = 0;

    const VERIFIED   = 1;
    const UNVERIFIED = 0;

    const PAYMENT_INITIATE = 0;
    const PAYMENT_SUCCESS  = 1;
    const PAYMENT_PENDING  = 2;
    const PAYMENT_REJECT   = 3;

    const TICKET_OPEN   = 0;
    const TICKET_ANSWER = 1;
    const TICKET_REPLY  = 2;
    const TICKET_CLOSE  = 3;

    const PRIORITY_LOW    = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH   = 3;

    const USER_ACTIVE = 1;
    const USER_BAN    = 0;

    const JOB_PENDING   = 0;
    const JOB_APPROVED  = 1;
    const JOB_COMPLETED = 2;
    const JOB_PAUSE     = 3;
    const JOB_REJECTED  = 9;

    const JOB_PROVE_PENDING = 0;
    const JOB_PROVE_APPROVE = 1;
    const JOB_PROVE_REJECT  = 2;

    const JOB_PROVE_REQUIRED = 2;
    const JOB_PROVE_OPTIONAL = 1;
}