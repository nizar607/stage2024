package com.example.stage24.service.access.implementation;

import com.example.stage24.domain.contact.PeopleGroup;
import com.example.stage24.domain.user.Access;
import com.example.stage24.domain.user.AccessType;
import com.example.stage24.model.response.contact.PeopleGroupResponse;
import com.example.stage24.repository.contact.PeopleGroupRepository;
import com.example.stage24.repository.user.AccessRepository;
import com.example.stage24.service.access.AccessServiceInterface;
import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Set;
import java.util.stream.Collectors;

@Service
@Slf4j
@AllArgsConstructor
public class AccessServiceImp implements AccessServiceInterface {

    public AccessRepository accessRepository;


    @Override
    public Access addAccess(String access) {
        Access _access = new Access(AccessType.valueOf(access));
        return accessRepository.save(_access);
    }

    @Override
    public List<Access> getAccesses() {
        return accessRepository.findAll();
    }

}
