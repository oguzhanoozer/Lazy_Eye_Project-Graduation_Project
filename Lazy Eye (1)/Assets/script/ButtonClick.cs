using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System.Globalization;
using System;


public class ButtonClick : MonoBehaviour {

    public float previousTime;
    public float currentTime;
    public int clickCount;
    
    public string game_dimension;
    StartGameButton startGameButton;
    NewStartGame newstart;
    
    public GameObject scorePanel;
    public Text scoreText;
    
    private string positionString;

   
    public GameObject playOtherLevelButton;
    public GameObject playAgainButton;
    
    public string userName;
   

    public GameObject passerUserNameObje;
    PasserUserName passerUserName;
    
    public AudioClip MusicClip;
    public AudioSource MusicSource;
    public int randomStateNumber;

    
    public List<int> randomX = new List<int>();
    public List<int> randomY = new List<int>();
    public List<float> clickTimes = new List<float>();


    private Vector2 previousPosition;
    private string scoreString;
    
   

    private void Awake()
    {
        if(transform.gameObject.name== "redBall12_8")
        {
            previousPosition = new Vector2(transform.parent.position.x - 720f, transform.parent.position.y - 480f);

        } else if (transform.gameObject.name == "redBall16_9")
        {
            previousPosition = new Vector2(transform.parent.position.x - 960f, transform.parent.position.y - 540f);
        }else if (transform.gameObject.name == "redBall8_6")
        {
            previousPosition = new Vector2(transform.parent.position.x - 480f, transform.parent.position.y - 360f);
        }
       
        UnityEngine.Random.InitState(randomStateNumber);
        
        


    }

    // Use this for initialization
    void Start()
    {
       
        passerUserName = passerUserNameObje.GetComponent<PasserUserName>();
        startGameButton = playAgainButton.GetComponent<StartGameButton>();
        previousTime = 0.0f;
        currentTime = 0.0f;
        ClickArea();
        MusicSource.clip = MusicClip;
        userName = passerUserName.username;
        

    }

    // Update is called once per frame.
    void Update()
    {
        currentTime += Time.deltaTime;
    }

void SaveRecordToDb()
    {

     
        
            
            WWWForm form = new WWWForm();
            form.AddField("username", userName);
            form.AddField("game_dimension", game_dimension);
            form.AddField("game_randSeed_id", randomStateNumber);
            form.AddField("PX1", randomX[0]);
            form.AddField("PY1", randomY[0]);
            form.AddField("PX2", randomX[1]);
            form.AddField("PY2", randomY[1]);
            form.AddField("PX3", randomX[2]);
            form.AddField("PY3", randomY[2]);
            form.AddField("PX4", randomX[3]);
            form.AddField("PY4", randomY[3]);
            form.AddField("PX5", randomX[4]);
            form.AddField("PY5", randomY[4]);
            form.AddField("PX6", randomX[5]);
            form.AddField("PY6", randomY[5]);
            form.AddField("PX7", randomX[6]);
            form.AddField("PY7", randomY[6]);
            form.AddField("PX8", randomX[7]);
            form.AddField("PY8", randomY[7]);
            form.AddField("PX9", randomX[8]);
            form.AddField("PY9", randomY[8]);
            form.AddField("PX10", randomX[9]);
            form.AddField("PY10", randomY[9]);

        form.AddField("time1", clickTimes[0].ToString("F2"));
        form.AddField("time2", clickTimes[1].ToString("F2"));
        form.AddField("time3", clickTimes[2].ToString("F2"));
        form.AddField("time4", clickTimes[3].ToString("F2"));
        form.AddField("time5", clickTimes[4].ToString("F2"));
        form.AddField("time6", clickTimes[5].ToString("F2"));
        form.AddField("time7", clickTimes[6].ToString("F2"));
        form.AddField("time8", clickTimes[7].ToString("F2"));
        form.AddField("time9", clickTimes[8].ToString("F2"));
        form.AddField("time10", clickTimes[9].ToString("F2"));
        
        WWW www = new WWW("http://localhost:8080/lazyeye/php/games.php", form);

      

    }

    public void RedBallClicked()
    {

     
        MusicSource.Play();
        clickCount++;
        float lastTime = currentTime - previousTime;
        clickTimes.Add(lastTime);
        
        if (clickCount==10)
        {
            
            Time.timeScale = 0;
         
            SaveRecordToDb();

            scoreString = "Your Scores :\n\n"; 
            
            for (int i = 0; i < clickTimes.Count; i++)
            {
                 
                scoreString += (i + 1) + ". Click Order : " + clickTimes[i].ToString("F2") + " (" + randomX[i] + " , " + randomY[i] + ")" + "\n";

            }

            if (randomStateNumber == 3)
            {
                playAgainButton.SetActive(false);
                playOtherLevelButton.SetActive(true);
            }

          
            scorePanel.SetActive(true);
            scoreText.text = scoreString;
            transform.gameObject.SetActive(false);
            
            clickCount = 0;
            clickTimes.Clear();
            randomX.Clear();
            randomY.Clear();
            currentTime = 0;

        }
        ClickArea();
        currentTime = 0.0f;
        
    }

    void ClickArea()
    {
        
        int maxRangeOfCol;
        int maxRangeOfRow;

        if (transform.gameObject.name == "redBall16_9")
        {
            maxRangeOfCol = 16;
            maxRangeOfRow = 9;
           
            game_dimension = "16x9";
        }
        else if (transform.gameObject.name == "redBall12_8")
        {
            maxRangeOfCol = 12;
            maxRangeOfRow = 8;
           
            game_dimension = "12x8";
        }
        else
        {
            maxRangeOfCol = 8;
            maxRangeOfRow = 6;
            
            game_dimension = "8x6";
        }
        

           int colRandom = UnityEngine.Random.Range(1, maxRangeOfCol);
           int rowRandom = UnityEngine.Random.Range(1, maxRangeOfRow);

            randomX.Add(colRandom);
            randomY.Add(rowRandom);

       
            print(colRandom + " , " + rowRandom);
        
            Vector2 areaPosition = previousPosition + new Vector2((colRandom - 1) * 120f + 60f, (rowRandom - 1) * 120f + 60f);
            transform.localPosition = areaPosition;
        }


}
    