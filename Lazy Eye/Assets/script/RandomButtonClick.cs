using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class RandomButtonClick : MonoBehaviour
{
    public GameObject passerObject;
    PasserUserName passerUserName;
    public string username;

    public GameObject createNewRandomObject;
    CreateNewRandomGame createNewRandomGame;

    public List<int> myArrayX = new List<int>(new int[10]);
    public List<int> myArrayY = new List<int>(new int[10]);

    



    int j = 1;
    public int i;
    int k = 1;

    public float previousTime;
    public float currentTime;
    public int clickCount=0;
    private ManualGame man;
    public string game_dimension;
    StartGameButton startGameButton;

    public GameObject scorePanel;
    public GameObject startPanel;
    public Text scoreText;

    private string positionString;

    //public GameObject playOtherLevelButton;
    //public GameObject playAgainButton;

    public string userName;

    public AudioClip MusicClip;
    public AudioSource MusicSource;
    public int randomStateNumber;

    private int checkManuelId = 0;


    public List<float> clickTimes = new List<float>();


   public Vector2 previousPosition;
    private string scoreString;

 
    private void Awake()
    {
        createNewRandomGame = createNewRandomObject.GetComponent<CreateNewRandomGame>();
        passerUserName = passerObject.GetComponent<PasserUserName>();

        userName = passerUserName.username;

        if (transform.gameObject.name == "redBall12_8")
        {
            previousPosition = new Vector2(transform.parent.position.x - 720f, transform.parent.position.y - 480f);
            game_dimension = "12x8";

        }
        else if (transform.gameObject.name == "redBall16_9")
        {
            previousPosition = new Vector2(transform.parent.position.x - 960f, transform.parent.position.y - 540f);
            game_dimension = "16x9";
        }
        else if (transform.gameObject.name == "redBall8_6")
        {
            previousPosition = new Vector2(transform.parent.position.x - 480f, transform.parent.position.y - 360f);
            game_dimension = "8x6";
        }



    }

    private void Update()
    {
        currentTime += Time.deltaTime;
    }

    // Start is called before the first frame update
    void Start()
    {
        print("i === " + i);
        previousTime = 0.0f;
        currentTime = 0.0f;

        print(createNewRandomGame.checkGameType_Dim);
        if (createNewRandomGame.checkGameType_Dim == 1)
        {
           
            for(int j =0;j<20;j=j+2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j+1]);
                print(myArrayX[i] +"    "+ myArrayY[i]);
                i++;
            }
            
            randomStateNumber = 1;
            
        }
        else if (createNewRandomGame.checkGameType_Dim == 2)
        {
            for (int j = 20; j < 40; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 2;
        }
        else if (createNewRandomGame.checkGameType_Dim == 3)
        {
            for (int j = 40; j < 60; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 3;
        }
        else if (createNewRandomGame.checkGameType_Dim == 4)
        {
            Debug.Log("girdi");
            for (int j = 60; j < 80; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 1;
        }
        else if (createNewRandomGame.checkGameType_Dim == 5)
        {
            for (int j = 80; j < 100; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 2;
        }
        else if (createNewRandomGame.checkGameType_Dim == 6)
        {
            for (int j = 100; j < 120; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 3;
        }
        else if (createNewRandomGame.checkGameType_Dim == 7)
        {
            for (int j = 120; j < 140; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 1;
        }
        else if (createNewRandomGame.checkGameType_Dim == 8)
        {
            for (int j = 140; j < 160; j = j + 2)
            {
                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 2;

        }
        else if (createNewRandomGame.checkGameType_Dim == 9)
        {
            for (int j = 160; j < 180; j = j + 2)
            {
                print("geldi");


                print("x : " + int.Parse(createNewRandomGame.newpoints[j]));
                print("y : " + int.Parse(createNewRandomGame.newpoints[j + 1]));

                myArrayX[i] = int.Parse(createNewRandomGame.newpoints[j]);
                myArrayY[i] = int.Parse(createNewRandomGame.newpoints[j + 1]);
                print(myArrayX[i] + "    " + myArrayY[i]);
                i++;
            }
            randomStateNumber = 3;
        }


        int rowRandom = myArrayX[0];
        int colRandom = myArrayY[0];


        Vector2 areaPosition = previousPosition + new Vector2((rowRandom - 1) * 120f + 60f, (colRandom - 1) * 120f + 60f);
        transform.localPosition = areaPosition;

        i = 1;
    }

    void SaveRecordToDb()
    {
        username = LoginChecker.username;
        WWWForm form = new WWWForm();
        form.AddField("username", username);
        form.AddField("game_dimension", game_dimension);
        form.AddField("game_randSeed_id", randomStateNumber);
        form.AddField("PX1", myArrayX[0]);
        form.AddField("PY1", myArrayY[0]);
        form.AddField("PX2", myArrayX[1]);
        form.AddField("PY2", myArrayY[1]);
        form.AddField("PX3", myArrayX[2]);
        form.AddField("PY3", myArrayY[2]);
        form.AddField("PX4", myArrayX[3]);
        form.AddField("PY4", myArrayY[3]);
        form.AddField("PX5", myArrayX[4]);
        form.AddField("PY5", myArrayY[4]);
        form.AddField("PX6", myArrayX[5]);
        form.AddField("PY6", myArrayY[5]);
        form.AddField("PX7", myArrayX[6]);
        form.AddField("PY7", myArrayY[6]);
        form.AddField("PX8", myArrayX[7]);
        form.AddField("PY8", myArrayY[7]);
        form.AddField("PX9", myArrayX[8]);
        form.AddField("PY9", myArrayY[8]);
        form.AddField("PX10", myArrayX[9]);
        form.AddField("PY10", myArrayY[9]);

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



    // Update is called once per frame
    public void RedBallClicked()
    {
        print("i degeri " + i);
       
        int rowRandom = myArrayY[i];
        int colRandom = myArrayX[i];

        print(colRandom + " , " + rowRandom);

        Vector2 areaPosition = previousPosition + new Vector2((colRandom - 1) * 120f + 60f, (rowRandom - 1) * 120f + 60f);
        transform.localPosition = areaPosition;
        clickCount++;
        float lastTime = currentTime - previousTime;
        clickTimes.Add(lastTime);
       


        if (i==9)
        {
            print(clickTimes.Count);
            Time.timeScale = 0;
               
             SaveRecordToDb();

            scoreString = "Your Scores :\n\n";

            for (int i = 0; i < clickTimes.Count; i++)
            {

                scoreString += (i + 1) + ". Click Order : " + clickTimes[i].ToString("F2") + " (" + myArrayX[i] + " , " + myArrayY[i] + ")" + "\n";
            }
            scorePanel.SetActive(true);
            scoreText.text = scoreString;
            transform.gameObject.SetActive(false);

            clickCount = 0;
            clickTimes.Clear();
         

            currentTime = 0;



            
        }
        
        i++;
        currentTime = 0.0f;
    }
    
    
}
