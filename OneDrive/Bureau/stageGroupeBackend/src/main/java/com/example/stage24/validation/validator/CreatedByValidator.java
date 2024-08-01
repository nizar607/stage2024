package com.example.stage24.validation.validator;

import com.example.stage24.domain.user.RoleType;
import com.example.stage24.domain.user.User;
import com.example.stage24.domain.user.Role;
import com.example.stage24.validation.annotation.CreatedByRequired;
import jakarta.validation.ConstraintValidator;
import jakarta.validation.ConstraintValidatorContext;

import java.util.Set;

public class CreatedByValidator implements ConstraintValidator<CreatedByRequired, User> {

    @Override
    public void initialize(CreatedByRequired constraintAnnotation) {
    }

    @Override
    public boolean isValid(User user, ConstraintValidatorContext context) {
        if (user == null) {
            return true; // Not the responsibility of this validator to check null user objects.
        }
        boolean roleMatch = user
                .getRoles()
                .stream()
                .anyMatch(role -> RoleType.ROLE_AGENT.name().equals(role.getName().name()) || RoleType.ROLE_CLIENT.name().equals(role.getName().name()));
        if (roleMatch) {
            return user.getCreatedBy() != null;
        }
        return true;
    }
}
