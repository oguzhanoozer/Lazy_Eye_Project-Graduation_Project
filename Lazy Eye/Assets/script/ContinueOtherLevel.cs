using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ContinueOtherLevel : MonoBehaviour {
    
    public GameObject upLevelCanvas;
    public GameObject currenLevelCanvas;

    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}


    public void OpenOtherLevel()
    {
        currenLevelCanvas.SetActive(false);
        upLevelCanvas.SetActive(true);
    }

}
