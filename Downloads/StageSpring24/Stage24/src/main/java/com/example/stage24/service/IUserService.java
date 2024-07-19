package com.example.stage24.service;

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
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

import java.util.HashSet;
import java.util.List;
import java.util.Set;
import java.util.stream.Collectors;


public interface IUserService {

    public JwtResponse authenticateUser(LoginRequest loginRequest);

    public TokenRefreshResponse refreshtoken(TokenRefreshRequest request);

    public User registerUser(SignupRequest signUpRequest);

    public Role addRole(Role role);

    public List<User> getUsers();

}
