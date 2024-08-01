package com.example.stage24.rest.user;


import com.example.stage24.domain.user.Role;
import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.user.LoginRequest;
import com.example.stage24.model.request.user.SignupRequest;
import com.example.stage24.model.request.user.TokenRefreshRequest;
import com.example.stage24.model.response.MessageResponse;
import com.example.stage24.service.user.IUserService;
import jakarta.validation.Valid;
import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;

import java.util.List;

//@CrossOrigin(origins = "*", maxAge = 3600)
@Validated
@RequestMapping("/api/auth")
@AllArgsConstructor
@RestController
public class AuthResource {


    IUserService userService;

    @PostMapping("/signin")
    public ResponseEntity<?> authenticateUser(@Valid @RequestBody LoginRequest loginRequest) {
        return ResponseEntity.ok(
                userService.authenticateUser(loginRequest)
        );
    }

    @PostMapping("/refreshtoken")
    public ResponseEntity<?> refreshtoken(@Valid @RequestBody TokenRefreshRequest request) throws Exception {
        return ResponseEntity.ok(userService.refreshtoken(request));
    }

    @PostMapping("/signup")
    public ResponseEntity<?> registerUser(@Valid @RequestBody SignupRequest signUpRequest) {
        User user = userService.registerUser(signUpRequest);

        if (user == null) {
            return ResponseEntity
                    .badRequest()
                    .body(new MessageResponse("Error: Email is already in use!"));
        }

        return ResponseEntity.ok(new MessageResponse("User registered successfully!"));
    }

    @PostMapping("/add-agent")
    @PreAuthorize("hasRole('ROLE_LAWYER') or hasRole('ROLE_ADMIN')")
    public ResponseEntity<?> registerAgent(@Valid @RequestBody SignupRequest signUpRequest) {
        User user = userService.registerUser(signUpRequest);

        if (user == null) {
            return ResponseEntity
                    .badRequest()
                    .body(new MessageResponse("Error: Email is already in use!"));
        }

        return ResponseEntity.ok(new MessageResponse("User registered successfully!"));
    }

    @PostMapping("/add-role")
    public Role addRole(@Valid @RequestBody Role role) {
        return userService.addRole(role);
    }

    //@PreAuthorize("hasRole('ROLE_LAWYER')")
    @GetMapping("/get-users")
    public List<User> getUsers() {
        return userService.getUsers();
    }


}
