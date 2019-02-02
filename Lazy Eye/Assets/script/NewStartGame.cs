using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class NewStartGame : MonoBehaviour
{
   // public GameObject redball;
    public GameObject redBallActive;
    public GameObject randombutton;
    RandomButtonClick random;
    

    //OptionMenu option;
    // public GameObject myoption;


    ButtonClick buttonClick;
    private void Awake()
    {
     //   option = myoption.GetComponent<OptionMenu>();
          random = randombutton.GetComponent<RandomButtonClick>();
        buttonClick = redBallActive.GetComponent<ButtonClick>();
    
    }


    // Start is called before the first frame update
    void Start()
    {
        Time.timeScale = 0f; 

    }

    // Update is called once per frame
    void Update()
    {
        
    }
    

    public void StartGame()
    {
        
            int rowRandom = random.myArrayX[0];
            int colRandom = random.myArrayY[0];


            Vector2 areaPosition = random.previousPosition + new Vector2((rowRandom - 1) * 120f + 60f, (colRandom - 1) * 120f + 60f);
            redBallActive.transform.localPosition = areaPosition;
       
      


        transform.parent.gameObject.SetActive(false);

        redBallActive.SetActive(true);
        
        Time.timeScale = 1f; //game start
    }
}
