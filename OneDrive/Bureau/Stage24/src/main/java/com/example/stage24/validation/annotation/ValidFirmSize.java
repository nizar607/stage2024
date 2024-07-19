package com.example.stage24.validation.annotation;

import com.example.stage24.validation.validator.FirmSizeValidator;
import jakarta.validation.Constraint;
import jakarta.validation.Payload;
import java.lang.annotation.ElementType;
import java.lang.annotation.Retention;
import java.lang.annotation.RetentionPolicy;
import java.lang.annotation.Target;

@Constraint(validatedBy = FirmSizeValidator.class)
@Target({ ElementType.TYPE })
@Retention(RetentionPolicy.RUNTIME)
public @interface ValidFirmSize {
    String message() default "Invalid firm size";
    Class<?>[] groups() default {};
    Class<? extends Payload>[] payload() default {};
}