package com.example.stage24.service.contact.implementation;

import com.example.stage24.domain.contact.PeopleGroup;
import com.example.stage24.repository.contact.PeopleGroupRepository;
import com.example.stage24.service.contact.PeopleGroupServiceInterface;
import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Set;

@Service
@Slf4j
@AllArgsConstructor
public class PeopleGroupServiceImp implements PeopleGroupServiceInterface {

    public PeopleGroupRepository peopleGroupRepository;

    @Override
    public Set<PeopleGroup> getPeopleGroupsByUserId( String id ,String systemId) {
        return peopleGroupRepository.findPeopleGroupByCreatedBy_IdOrCreatedBy_Id(id, systemId);
    }

    @Override
    public PeopleGroup addPeopleGroup(PeopleGroup peopleGroup) {
        return peopleGroupRepository.save(peopleGroup);
    }

    @Override
    public List<PeopleGroup> getPeopleGroups() {
        return peopleGroupRepository.findAll();
    }

}
