package com.example.stage24.service.access;

import com.example.stage24.domain.contact.PeopleGroup;
import com.example.stage24.domain.user.Access;
import com.example.stage24.domain.user.AccessType;
import com.example.stage24.model.response.contact.PeopleGroupResponse;

import java.util.List;
import java.util.Set;

public interface AccessServiceInterface {

    public Access addAccess(String access);

    public List<Access> getAccesses();
}
