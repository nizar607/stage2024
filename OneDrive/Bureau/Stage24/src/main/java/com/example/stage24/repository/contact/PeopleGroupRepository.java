package com.example.stage24.repository.contact;

import com.example.stage24.domain.contact.PeopleGroup;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.stereotype.Repository;

import java.util.Set;

@Repository
public interface PeopleGroupRepository extends MongoRepository<PeopleGroup,String> {
    public Set<PeopleGroup> findPeopleGroupByCreatedBy_IdOrCreatedBy_Id(String id, String systemId);


}
