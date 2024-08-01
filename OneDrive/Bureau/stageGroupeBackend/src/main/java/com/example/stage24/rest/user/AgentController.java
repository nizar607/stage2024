package com.example.stage24.rest.user;


import com.example.stage24.domain.user.Access;
import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.user.NewAgentRequest;
import com.example.stage24.model.response.user.AgentResponse;
import com.example.stage24.service.shared.SharedServiceInterface;
import com.example.stage24.service.user.AgentServiceInterface;
import jakarta.validation.Valid;
import lombok.AllArgsConstructor;

import lombok.extern.slf4j.Slf4j;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

import org.springframework.beans.factory.annotation.Value;

//@CrossOrigin(origins = "*", maxAge = 3600)
@Validated
@RequestMapping("/api/agent")
@AllArgsConstructor
@RestController
@Slf4j
public class AgentController {

    AgentServiceInterface agentService;
    SharedServiceInterface sharedService;


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

    @PostMapping("/upload")
    public ResponseEntity<String> uploadImage(@RequestParam("file") MultipartFile file) throws IOException {
        String result = sharedService.addFile(file);
        log.info("file here " + result);
        return ResponseEntity.ok(
                result
        );
    }


    @PostMapping("/")
    public ResponseEntity<?> createAgent(
            @RequestParam("firstName") String firstName,
            @RequestParam("lastName") String lastName,
            @RequestParam("email") String email,
            @RequestParam("password") String password,
            @RequestParam("phoneNumber") String phoneNumber,
            @RequestParam("address") String address,
            @RequestParam("accesses") List<String> accesses,
            @RequestParam(value = "file", required = false) MultipartFile image
    ) throws IOException {

        String result = sharedService.addFile(image);

        NewAgentRequest agentRequest = new NewAgentRequest(firstName, lastName, email, password, phoneNumber, address, accesses, result);
        log.info("agentRequest " + " " + agentRequest);
        User user = agentService.registerAgent(agentRequest);
        log.info("user here " + user + " " + result);
        return ResponseEntity.ok(
                user
        );
    }

    @GetMapping("/download/{id}")
    public ResponseEntity<?> downloadImage(@PathVariable String id) {
        try {
            return ResponseEntity.ok(this.sharedService.downloadFile(id));
        }catch(IOException ex){
            ex.printStackTrace();
            return ResponseEntity.notFound().build();
        }
    }

    @GetMapping
    public ResponseEntity<?> createAgent(
            @PathVariable("id") String agentId
    ) throws IOException {

        return ResponseEntity.ok(
                sharedService.downloadFile(agentId)
        );
    }

   /* @PostMapping("/")
    public ResponseEntity<?> addAgent(@RequestBody NewAgentRequest agentRequest) throws IOException {
        //User user = agentService.registerAgent(agentRequest);
        return ResponseEntity.ok(
                new AgentResponse("agent.getId()", "agent.getFirstName()", "agent.getLastName()", "agent.getEmail()", "agent.getPassword()", "agent.getPhoneNumber()", "agent.getAddress()", new ArrayList<>(), "agent.getImage()")
        );

    }*/

    @GetMapping("/")
    public ResponseEntity<?> getAgents() {
        return ResponseEntity.ok(
                agentService.getAgents().stream().map((agent) ->

                        new AgentResponse(agent.getId(), agent.getFirstName(), agent.getLastName(), agent.getEmail(), agent.getPassword(), agent.getPhoneNumber(), agent.getAddress(), agent.getAccesses().stream().map(a -> a.getType().name()).toList(), agent.getImage(),agent.getCreatedAt())
                ));
    }

    @GetMapping("/{id}")
    public ResponseEntity<?> getAgentById(@PathVariable String id) {
        log.info("getAgentById");
        return ResponseEntity.ok(
                null
        );
    }

    @PutMapping("/{id}")
    public ResponseEntity<?> updateAgent(@PathVariable String id) {
        log.info("updateAgent");
        return ResponseEntity.ok(
                null
        );
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<?> deleteAgent(@PathVariable String id) {
        log.info("deleteAgent");

        return ResponseEntity.ok(
                agentService.deleteAgent(id)
        );
    }


}
