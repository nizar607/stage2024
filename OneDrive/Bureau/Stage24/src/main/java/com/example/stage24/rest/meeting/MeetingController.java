package com.example.stage24.rest.meeting;

import com.example.stage24.service.user.IUserService;
import com.example.stage24.service.contact.PeopleGroupServiceInterface;
import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;

@Validated
@Slf4j
@RestController
@RequestMapping("/api/meeting")
@AllArgsConstructor

public class MeetingController {

    private PeopleGroupServiceInterface peopleGroupService;
    private IUserService userService;




    @GetMapping("/")
    public ResponseEntity<?> getPeopleGroups() {
        return ResponseEntity.ok("meeting");
    }
}
