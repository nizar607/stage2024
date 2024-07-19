package com.example.stage24.model.request.user;

import jakarta.validation.constraints.NotBlank;

public class NewUserRequest {

    @NotBlank
    private String username;
}
