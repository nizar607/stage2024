package com.example.stage24.rest;


import com.example.stage24.domain.ERole;
import com.example.stage24.domain.RefreshToken;
import com.example.stage24.domain.Role;
import com.example.stage24.domain.User;
import com.example.stage24.model.request.LoginRequest;
import com.example.stage24.model.request.SignupRequest;
import com.example.stage24.model.request.TokenRefreshRequest;
import com.example.stage24.model.response.JwtResponse;
import com.example.stage24.model.response.MessageResponse;
import com.example.stage24.model.response.TokenRefreshResponse;
import com.example.stage24.repository.RoleRepository;
import com.example.stage24.repository.UserRepository;
import com.example.stage24.security.jwt.JwtUtils;
import com.example.stage24.security.services.RefreshTokenService;
import com.example.stage24.security.services.UserDetailsImpl;
import com.example.stage24.service.IUserService;
import com.example.stage24.service.UserServiceImpl;
import jakarta.validation.Valid;
import lombok.AllArgsConstructor;
import lombok.RequiredArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;

import java.util.HashSet;
import java.util.List;
import java.util.Set;
import java.util.stream.Collectors;

@Validated
@CrossOrigin(origins = "*", maxAge = 3600)
@RestController
@RequestMapping("/api/auth")
@AllArgsConstructor
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


    @PostMapping("/add-role")
    public Role addRole(@Valid @RequestBody Role role) {
        return userService.addRole(role);
    }

    @PreAuthorize("hasRole('ROLE_USER')")
    @GetMapping("/get-users")
    public List<User> getUsers() {
        return userService.getUsers();
    }
}
