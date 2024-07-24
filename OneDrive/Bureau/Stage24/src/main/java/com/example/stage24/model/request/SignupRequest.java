package com.example.stage24.model.request;

import com.example.stage24.domain.user.Role;
import jakarta.validation.constraints.*;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.data.mongodb.core.mapping.DBRef;

import java.util.HashSet;
import java.util.Set;

@Data
@NoArgsConstructor
public class SignupRequest {

    @NotBlank
    @Size(min = 3, max = 20)
    private String firstName;

    @NotBlank
    @Size(min = 3, max = 20)
    private String lastName;
 
    @NotBlank
    @Size(max = 50)
    @Email
    private String email;
    
    @NotBlank
    @Size(min = 6, max = 40)
    private String password;


    private Integer firmSize;

    @NotNull
    private Set<String> roles = new HashSet<>();

}
