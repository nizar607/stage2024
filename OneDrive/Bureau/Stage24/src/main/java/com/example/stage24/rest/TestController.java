package com.example.stage24.rest;

import com.example.stage24.domain.contact.PeopleGroup;
import com.example.stage24.service.contact.PeopleGroupServiceInterface;
import com.example.stage24.service.contact.implementation.PeopleGroupServiceImp;
import lombok.AllArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.security.access.prepost.PreAuthorize;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@AllArgsConstructor
@RequestMapping("/api/test")
public class TestController {

	private PeopleGroupServiceInterface peopleGroupService;

	@GetMapping("/all")
	public String allAccess() {
		return "Public Content.";
	}
	
	@GetMapping("/user")
	@PreAuthorize("hasRole('USER') or hasRole('MODERATOR') or hasRole('ADMIN')")
	public String userAccess() {
		return "User Content.";
	}

	@GetMapping("/mod")
	@PreAuthorize("hasRole('MODERATOR')")
	public String moderatorAccess() {
		return "Moderator Board.";
	}

	@GetMapping("/admin")
	public String adminAccess() {
		return "Admin Board.";
	}

	@GetMapping
	public ResponseEntity<List<PeopleGroup>> getPeopleGroups() {
		return ResponseEntity.ok(peopleGroupService.getPeopleGroups());
	}
}
