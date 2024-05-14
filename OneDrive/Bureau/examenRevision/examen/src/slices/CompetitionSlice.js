import { createSlice } from "@reduxjs/toolkit";
import { getCompetitions, updateCompetition } from "../services/ExamenService";
import * as redux from "redux";

const applyMiddleWare = redux.applyMiddleware;

let initialState = {
    competitions: [],
    selectedCompetition: null,
    error: null
};

const competitionSlice = createSlice({
    name: "competition",
    initialState,
    reducers: {
        setCompetitions: (state, action) => {
            state.competitions = action.payload;
        },
        setSelectedCompetition: (state, action) => {
            state.selectedCompetition = action.payload;
        },
        setError: (state, action) => {
            state.error = action.payload;
        }
    }
});

export const fetchCompetitions = () => async (dispatch) => {
    try {
        const response = await getCompetitions();
        dispatch(setCompetitions(response.data));
        console.log("data here ", response.data);
    } catch (error) {
        dispatch(setError(error.message));
    }
};

export const addParticipant = (competitionId, participantName) => async (dispatch, getState) => {

    const state = getState();

    const competitions = state.competitions.competitions.map(c => {
        if (c.id === competitionId) {
            return {
                ...c,
                listParticipants: [...c.listParticipants, participantName]
            };
        } else {
            return c;
        }
    });

    const updatedCompetition = competitions.find(c => c.id === competitionId);

    try {
        const response = await updateCompetition(updatedCompetition);
        dispatch(setCompetitions(competitions));
        // dispatch(setSelectedCompetition(updatedCompetition));
    } catch (error) {
        console.error('Failed to update competition in database:', error);
    }
};

export const selectCompetitions = (state) => { return [state.competitions.competitions, state.competitions.error] };

export const { setCompetitions, setSelectedCompetition, setError } = competitionSlice.actions;
export default competitionSlice.reducer;