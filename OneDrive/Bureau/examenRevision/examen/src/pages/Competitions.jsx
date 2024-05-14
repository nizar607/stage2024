import Competition from "../sections/Competition";
import { useEffect, useState } from 'react';
import { getCompetitions } from "../services/ExamenService";
import axios from 'axios';
import { useDispatch, useSelector } from "react-redux";
import { selectCompetitions } from "../slices/CompetitionSlice";


function Competitions() {
    const dispatch = useDispatch();
    const [competitions, error] = useSelector(selectCompetitions);


    // const [competitions, setCompetitions] = useState([]);


    // async function fetchCompetitions() {
    //     const response = await axios.get("http://localhost:3000/competitions");
    //     setCompetitions(response.data);
    //     dispatch(setCompetitions(response.data));
    // }

    // useEffect(() => {
    //     fetchCompetitions();
    // }, []);

    return (

        <table className="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Date</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                {competitions.map((competition, i) =>
                    <Competition competition={competition} key={i} />
                )}

            </tbody>
        </table>
    )
}

export default Competitions;