using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PasserUserName : MonoBehaviour {

    public string username;
    

    

    // Use this for initialization
    void Start () {
        username = LoginChecker.username;   
    }

    // Update is called once per frame
    void Update()
    {
    }
	
}
