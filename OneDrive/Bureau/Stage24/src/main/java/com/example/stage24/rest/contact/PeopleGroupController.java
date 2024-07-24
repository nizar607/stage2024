package com.example.stage24.rest.contact;

import com.example.stage24.domain.contact.PeopleGroup;
import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.contact.NewPeopleGroupRequest;
import com.example.stage24.service.IUserService;
import com.example.stage24.service.contact.PeopleGroupServiceInterface;
import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Set;

@Validated
@Slf4j
@RestController
@RequestMapping("/api/people-group")
@AllArgsConstructor

public class PeopleGroupController {

    private PeopleGroupServiceInterface peopleGroupService;
    private IUserService userService;

    @GetMapping("/get-people-group-by-user")
    public ResponseEntity<Set<PeopleGroup>> getPeopleGroupsByUserId(@RequestParam String id, @RequestParam(required = false) String systemId) {
        Set<PeopleGroup> peopleGroups;
        if (systemId != null) {
            peopleGroups = peopleGroupService.getPeopleGroupsByUserId(id, systemId);
        } else {
            peopleGroups = peopleGroupService.getPeopleGroupsByUserId(id, id);
        }
        return ResponseEntity.ok(peopleGroups);
    }

    @PostMapping("/")
    public ResponseEntity<PeopleGroup> addPeopleGroup(@RequestBody NewPeopleGroupRequest newPeopleGroupRequest) {

        try {
            log.info("ADDED WITH SUCCESS, people-group:  " + newPeopleGroupRequest);

            User user = userService.getUserById(newPeopleGroupRequest.getCreatedBy());

            PeopleGroup peopleGroup = new PeopleGroup(newPeopleGroupRequest.getName(), user);
            PeopleGroup savedPeopleGroup = peopleGroupService.addPeopleGroup(peopleGroup);
            return ResponseEntity.ok(savedPeopleGroup);
        } catch (Exception e) {
            log.error("Error occurred while adding new PeopleGroup", e);

            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR).build();
        }


    }

    @GetMapping("/")
    public ResponseEntity<List<PeopleGroup>> getPeopleGroups() {
        return ResponseEntity.ok(peopleGroupService.getPeopleGroups());
    }
}
