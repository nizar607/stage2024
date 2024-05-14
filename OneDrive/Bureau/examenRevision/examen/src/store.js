import { configureStore } from "@reduxjs/toolkit";
import { thunk } from "redux-thunk";
// Import the slice
import competitionSlice from "./slices/CompetitionSlice";
import storage from "redux-persist/lib/storage";
import persistReducer from "redux-persist/es/persistReducer";
import rootReducer from "./reducers";
import persistStore from "redux-persist/es/persistStore";

const storeConfig = {
    key: 'root',
    storage: storage,
};

const persistedReducer = persistReducer(storeConfig, rootReducer);

export const store = configureStore({
    reducer: persistedReducer,
    middleware: () => [thunk]
});

export const persistor = persistStore(store);