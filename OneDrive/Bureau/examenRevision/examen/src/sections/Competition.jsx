
import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';
import { addParticipant } from '../slices/CompetitionSlice';
import { useDispatch, useSelector } from 'react-redux';



function Competition({ competition }) {

    

    return (
        <tr>
            <th scope="row">{competition.id}</th>
            <td>{competition.name}</td>
            <td>{competition.fees}</td>
            <td>{competition.date}</td>
            <td> <Link to={`/CompetionDetails/${competition.id}`}> Details</Link></td>
        </tr>
    );
}

export default Competition;