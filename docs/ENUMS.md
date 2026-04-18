# Enumy PHP — aplikacja wynajmu mieszkań

## PropertyType
```php
enum PropertyType: string
{
    case Apartment = 'apartment';
    case Room      = 'room';
}
```

## PropertyStatus
```php
enum PropertyStatus: string
{
    case Draft     = 'draft';
    case Pending   = 'pending';
    case Published = 'published';
    case Rejected  = 'rejected';
    case Archived  = 'archived';
}
```

## FurnishingType
```php
enum FurnishingType: string
{
    case Furnished          = 'furnished';
    case PartiallyFurnished = 'partially_furnished';
    case Unfurnished        = 'unfurnished';
}
```

## RentalPeriod
```php
enum RentalPeriod: string
{
    case Minimum1Month  = 'minimum_1_month';
    case Minimum3Months = 'minimum_3_months';
    case Minimum6Months = 'minimum_6_months';
    case Minimum12Months = 'minimum_12_months';
    case Indefinite     = 'indefinite';
}
```

## ViewingStatus
```php
enum ViewingStatus: string
{
    case Pending   = 'pending';
    case Accepted  = 'accepted';
    case Rejected  = 'rejected';
    case Cancelled = 'cancelled';
    case Completed = 'completed';
}
```

## PaymentStatus
```php
enum PaymentStatus: string
{
    case Pending   = 'pending';
    case Paid      = 'paid';
    case Failed    = 'failed';
    case Cancelled = 'cancelled';
}
```

## PaymentType
```php
enum PaymentType: string
{
    case Rent     = 'rent';
    case Deposit  = 'deposit';
    case ExtraFee = 'extra_fee';
}
```

## ContactMessageStatus
```php
enum ContactMessageStatus: string
{
    case New        = 'new';
    case InProgress = 'in_progress';
    case Closed     = 'closed';
}
```

## BlogPostStatus / PageStatus
```php
enum BlogPostStatus: string
{
    case Draft     = 'draft';
    case Published = 'published';
}
```

## ContractStatus
```php
enum ContractStatus: string
{
    case Draft     = 'draft';
    case Generated = 'generated';
    case Signed    = 'signed';
}
```
