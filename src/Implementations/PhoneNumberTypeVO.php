<?php

declare(strict_types=1);


namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Enums\EnumTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * @method static PhoneNumberFormatTypeVO FIXED_LINE()
 * @method static PhoneNumberFormatTypeVO MOBILE()
 * @method static PhoneNumberFormatTypeVO FIXED_LINE_OR_MOBILE()
 * @method static PhoneNumberFormatTypeVO TOLL_FREE()
 * @method static PhoneNumberFormatTypeVO PREMIUM_RATE()
 * @method static PhoneNumberFormatTypeVO SHARED_COST()
 * @method static PhoneNumberFormatTypeVO VOIP()
 * @method static PhoneNumberFormatTypeVO PERSONAL_NUMBER()
 * @method static PhoneNumberFormatTypeVO PAGER()
 * @method static PhoneNumberFormatTypeVO UAN()
 * @method static PhoneNumberFormatTypeVO UNKNOWN()
 * @method static PhoneNumberFormatTypeVO EMERGENCY()
 * @method static PhoneNumberFormatTypeVO VOICEMAIL()
 * @method static PhoneNumberFormatTypeVO SHORT_CODE()
 * @method static PhoneNumberFormatTypeVO STANDARD_RATE()
 */
final class PhoneNumberTypeVO implements ValueObject
{
    use EnumTrait;

    public const FIXED_LINE = 0;
    public const MOBILE = 1;
    // In some regions (e.g. the USA), it is impossible to distinguish between fixed-line and
    // mobile numbers by looking at the phone number itself.
    public const FIXED_LINE_OR_MOBILE = 2;
    // Freephone lines
    public const TOLL_FREE = 3;
    public const PREMIUM_RATE = 4;
    // The cost of this call is shared between the caller and the recipient, and is hence typically
    // less than PREMIUM_RATE calls. See // http://en.wikipedia.org/wiki/Shared_Cost_Service for
    // more information.
    public const SHARED_COST = 5;
    // Voice over IP numbers. This includes TSoIP (Telephony Service over IP).
    public const VOIP = 6;
    // A personal number is associated with a particular person, and may be routed to either a
    // MOBILE or FIXED_LINE number. Some more information can be found here:
    // http://en.wikipedia.org/wiki/Personal_Numbers
    public const PERSONAL_NUMBER = 7;
    public const PAGER = 8;
    // Used for "Universal Access Numbers" or "Company Numbers". They may be further routed to
    // specific offices, but allow one number to be used for a company.
    public const UAN = 9;
    // A phone number is of type UNKNOWN when it does not fit any of the known patterns for a
    // specific region.
    public const UNKNOWN = 10;

    // Emergency
    public const EMERGENCY = 27;

    // Voicemail
    public const VOICEMAIL = 28;

    // Short Code
    public const SHORT_CODE = 29;

    // Standard Rate
    public const STANDARD_RATE = 30;

}
