<div {{ $attributes->merge(['class' => 'form-error']) }}>
    <div>
        <i class="ri-error-warning-line"></i>
    </div>
    <span>{{ __($message) }}</span>
</div>
