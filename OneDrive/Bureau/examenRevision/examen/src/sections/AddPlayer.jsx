import React, { useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import { addParticipant, setSelectedCompetition } from "../slices/CompetitionSlice";
import { useSelector } from "react-redux";

function AddPlayer({ competition }) {

    const selectedCompetition = useSelector(state => state.competitions.selectedCompetition);
    const competitions = useSelector(state => state.competitions.competitions);
    const [username, setUsername] = useState("");
    const dispatch = useDispatch();



    useEffect(() => {
        dispatch(setSelectedCompetition(competition));
        console.log('Selected competition', selectedCompetition);
    }, [selectedCompetition]);

    const handleAddParticipant = (competition, participantName) => {
        console.log('Adding participant', participantName, 'to competition', competition.id);
        dispatch(addParticipant(competition.id, participantName));
    };



    return (
        <div className="container">

            <div className="mb-3">
                <label htmlFor="name" className="form-label">UserName</label>
                <input
                    name="name"
                    type="text"
                    className="form-control"
                    id="name"
                    placeholder="UserName"
                    value={username}
                    onChange={(e) => setUsername(e.target.value)}
                />
            </div>
            <button className="btn btn-primary" onClick={() => handleAddParticipant(competition, username)}>
                Add Participant
            </button>


            <div className="row my-5">
                <div className="col">
                    <h3>Participants</h3>
                    <ul>
                        {competition.listParticipants.map((participant, i) => (
                            <li key={i}>{participant}</li>
                        ))}
                    </ul>
                </div>
            </div>

            <p>
                {competitions[0].listParticipants.map((participant, i) => (
                    <li key={i}>{participant}</li>
                ))}
            </p>

        </div>
    );
}

export default AddPlayer;