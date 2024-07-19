package com.example.stage24.service;


import com.example.stage24.domain.phase.Phase;
import com.example.stage24.repository.phase.PhaseRepository;
import lombok.AllArgsConstructor;
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
