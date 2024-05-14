import { combineReducers } from "redux";
import competitions from "./slices/CompetitionSlice";

const reducer = combineReducers({
    competitions
});

export default reducer;
