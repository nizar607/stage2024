package com.example.stage24.rest.access;


import com.example.stage24.domain.user.Access;
import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.access.NewAccessRequest;
import com.example.stage24.model.request.user.NewAgentRequest;
import com.example.stage24.model.response.user.AgentResponse;
import com.example.stage24.service.access.AccessServiceInterface;
import com.example.stage24.service.shared.SharedServiceInterface;
import com.example.stage24.service.user.AgentServiceInterface;
import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.util.List;

//@CrossOrigin(origins = "*", maxAge = 3600)
@Validated
@RequestMapping("/api/access")
@AllArgsConstructor
@RestController
@Slf4j
public class AccessController {

    AccessServiceInterface accessService;


    @PostMapping("/test")
    public ResponseEntity<?> authenticateUser() {
        return ResponseEntity.ok(
                null
        );
    }

    /*
    @PostMapping("/upload")
    public ResponseEntity<?> upload(@RequestParam("file")MultipartFile file) throws IOException {
        return new ResponseEntity<>(fileService.addFile(file), HttpStatus.OK);
    }
     */

    @PostMapping("/")
    public ResponseEntity<Access> addAccess(@RequestBody NewAccessRequest newAccessRequest) throws IOException {
        return ResponseEntity.ok(
                accessService.addAccess(newAccessRequest.getType())
        );
    }

    @GetMapping("/")
    public ResponseEntity<?> getAgents() {
        return ResponseEntity.ok(
                accessService.getAccesses()
        );

    }


}
