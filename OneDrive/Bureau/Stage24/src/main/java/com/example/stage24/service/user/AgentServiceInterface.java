package com.example.stage24.service.user;

import com.example.stage24.domain.user.User;
import com.example.stage24.model.request.user.NewAgentRequest;

import java.util.List;

public interface AgentServiceInterface {
    public User registerAgent(NewAgentRequest agent);
    public User getAgentById(String id);
    public List<User> getAgents();
    public User deleteAgent(String id);
    public User updateAgent(String id,NewAgentRequest newAgentRequest);
}
