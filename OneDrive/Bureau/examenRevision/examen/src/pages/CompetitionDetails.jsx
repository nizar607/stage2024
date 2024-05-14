import axios from "axios";
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import AddPlayer from "../sections/AddPlayer";



function CompetionDetails() {

    const params = useParams();
    const [competition, setCompetition] = useState({});
    const [showform, setshowform] = useState(false);

    const fetchCompetion = async () => {
        const response = await axios.get(`http://localhost:3000/competitions/${params.id}`)
        setCompetition(response.data);
    }

    useEffect(() => {
        fetchCompetion();
    }, [])
    return <>
        <div className="container text-center ">
            <div className="row text-center"> {competition.name}</div>
            <div className="row text-center"> Price:{competition.fees}DT</div>
            <div className="row text-center"> Date:{competition.date}</div>
            <div className="row text-center"> {competition.description}</div>
            <div className="row text-center"> {competition.participants}</div>
            <button onClick={() => setshowform(true)} className={`btn btn-primary ${competition.participants == 0 && "disabled"}`}>Participate</button>
            {showform && <AddPlayer competition={competition} />}
        </div>

    </>
}
export default CompetionDetails;