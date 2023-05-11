<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    //this is for the agent controller dashboard
    public function AgentDashboard(){
        return view('agent.agent_dashboard');
    }//this is the end of the method 
}
