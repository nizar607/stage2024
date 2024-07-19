package com.example.stage24.service;


import com.example.stage24.domain.Phase;
import com.example.stage24.domain.User;
import com.example.stage24.repository.PhaseRepository;
import lombok.AllArgsConstructor;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

@Service
@AllArgsConstructor
public class PhaseService {

    PhaseRepository phaseRepository;

    public Phase findPhase(String id){
        return phaseRepository.findById(id)
                .orElseThrow(() -> new UsernameNotFoundException("phase Not Found with id: " + id));
    }
}
