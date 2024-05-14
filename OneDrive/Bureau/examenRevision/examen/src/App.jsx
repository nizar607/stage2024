import { useState } from 'react'

import './App.css'
import '../node_modules/bootstrap/dist/css/bootstrap.min.css'

import { Routes, Route } from 'react-router-dom';
// Sections
import NavBar from './sections/NavBar';

// Pages
import Home from './pages/Home'
import NotFound from './pages/NotFound'
import Competitions from './pages/Competitions';
import Home2 from './pages/Home2';
import { useDispatch } from 'react-redux';
import { fetchCompetitions } from './slices/CompetitionSlice';
import CompetionDetails from './pages/CompetitionDetails';



function App() {
  const dispatch = useDispatch();
  return (
    <>
      <NavBar />
      <Routes>
        <Route path="/" element={<Home2 />} />
        <Route path="/competitionsList" element={<Competitions />} loader={dispatch(fetchCompetitions(dispatch))} />
        <Route path="/CompetionDetails/:id" element={<CompetionDetails />}  />
        <Route path="*" element={<NotFound />} />
      </Routes>

    </>
  )
}

export default App
