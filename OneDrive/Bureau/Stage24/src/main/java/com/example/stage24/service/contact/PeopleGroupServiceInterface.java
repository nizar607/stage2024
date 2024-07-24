package com.example.stage24.service.contact;

import com.example.stage24.domain.contact.PeopleGroup;

import java.util.List;
import java.util.Set;

public interface PeopleGroupServiceInterface {
    public Set<PeopleGroup> getPeopleGroupsByUserId(String id, String systemId);

    public PeopleGroup addPeopleGroup(PeopleGroup peopleGroup);

    public List<PeopleGroup> getPeopleGroups();

}
