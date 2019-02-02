using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class StartGameButton : MonoBehaviour {

   
    public GameObject redBallActive;
 

    ButtonClick buttonClick;
    

    

    private void Awake()
    {
       buttonClick=redBallActive.GetComponent<ButtonClick>();

    }

   

    // Use this for initialization
    void Start () {
        Time.timeScale = 0f; //game stop

    }
	

	void Update () {
		
	}
   

    public void StartGame()
    {
        Time.timeScale = 1f; //game start 
        transform.parent.gameObject.SetActive(false);
        
        redBallActive.SetActive(true);

        
        buttonClick.randomStateNumber++;

        if (buttonClick.randomStateNumber > 3)
           buttonClick.randomStateNumber = 1;
       
        
    }
    
}
