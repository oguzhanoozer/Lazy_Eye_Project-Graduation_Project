using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System.Globalization;
using System;

    public class NewButtonClick : MonoBehaviour
    {
        public int gameId = 0;
        public float previousTime;
        public float currentTime;
        public int clickCount = 0;
        private ManualGame man;
        public string game_dimension;
        StartGameButton startGameButton;
        public GameObject manualGameObj;
        public GameObject nextGameButton;

        public GameObject scorePanel;
        public GameObject startPanel;
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


        public List<float> clickTimes = new List<float>();
        public List<int> xArray = new List<int>();
        public List<int> yArray = new List<int>();


        private Vector2 previousPosition;
        private string scoreString;

        public GameObject type_of_8x6;
        public GameObject type_of_12x8;
        public GameObject type_of_16x9;


        private void Awake()
        {
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
            man = manualGameObj.GetComponent<ManualGame>();
        
        }

    
        string[] str;

        // Use this for initialization
        void Start()
        {
            passerUserName = passerUserNameObje.GetComponent<PasserUserName>();
            startGameButton = playAgainButton.GetComponent<StartGameButton>();
            previousTime = 0.0f;
            currentTime = 0.0f;
            MusicSource.clip = MusicClip;
            userName = passerUserName.username;

            GetDivManPoints(gameId);

            int rowRandom = xArray[0];
            int colRandom = yArray[0];

            print(colRandom + " , " + rowRandom);

            Vector2 areaPosition = previousPosition + new Vector2((colRandom - 1) * 120f + 60f, (rowRandom - 1) * 120f + 60f);
            transform.localPosition = areaPosition;
        
        }

        void GetDivManPoints(int index)
        {
            string div = man.points[index];
            str = div.Split('.');

            for (int j = 0; j < str.Length; j++)
            {
                Debug.Log(str[j]);

                if (j % 2 == 0)
                    xArray.Add(int.Parse(str[j]));
                else
                    yArray.Add(int.Parse(str[j]));
            }

        }



        // Update is called once per frame.
        void Update()
        {
     
            currentTime += Time.deltaTime;
            print("clk  :    "+clickCount);    


        }

        void SaveRecordToDb()
        {
            WWWForm form = new WWWForm();
            form.AddField("username", userName);
            form.AddField("game_dimension", game_dimension);
            form.AddField("game_randSeed_id", randomStateNumber);
            form.AddField("PX1", man.newpoints[1]);
            form.AddField("PY1", man.newpoints[2]);
            form.AddField("PX2", man.newpoints[3]);
            form.AddField("PY2", man.newpoints[4]);
            form.AddField("PX3", man.newpoints[5]);
            form.AddField("PY3", man.newpoints[6]);
            form.AddField("PX4", man.newpoints[7]);
            form.AddField("PY4", man.newpoints[8]);
            form.AddField("PX5", man.newpoints[9]);
            form.AddField("PY5", man.newpoints[10]);
            form.AddField("PX6", man.newpoints[11]);
            form.AddField("PY6", man.newpoints[12]);
            form.AddField("PX7", man.newpoints[13]);
            form.AddField("PY7", man.newpoints[14]);
            form.AddField("PX8", man.newpoints[15]);
            form.AddField("PY8", man.newpoints[16]);
            form.AddField("PX9", man.newpoints[17]);
            form.AddField("PY9", man.newpoints[18]);
            form.AddField("PX10", man.newpoints[19]);
            form.AddField("PY10", man.newpoints[20]);

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
            

            if (clickCount == 10)
            {
                gameId++;
                Time.timeScale = 0;

                  // SaveRecordToDb();

                scoreString = "Your Scores :\n\n";

                for (int i = 0; i < clickTimes.Count; i++)
                {

                    scoreString += (i + 1) + ". Click Order : " + clickTimes[i].ToString("F2") + " (" + xArray[i] + " , " + yArray[i] + ")" + "\n";

                }

                if (man.points.Length > 1)
                    nextGameButton.SetActive(true);



                if (gameId == man.points.Length - 1)
                {
                    nextGameButton.SetActive(false);
                }


                scorePanel.SetActive(true);
                scoreText.text = scoreString;
                transform.gameObject.SetActive(false);

                clickCount = 0;

                clickTimes.Clear();
                xArray.Clear();
                yArray.Clear();

                GetDivManPoints(gameId);


                currentTime = 0;

            }

            int rowRandom = yArray[clickCount];
            int colRandom = xArray[clickCount];

            print(colRandom + " , " + rowRandom);

            Vector2 areaPosition = previousPosition + new Vector2((colRandom - 1) * 120f + 60f, (rowRandom - 1) * 120f + 60f);
            transform.localPosition = areaPosition;


            currentTime = 0.0f;

        }


        public void IncreaseIVal()
        {
            print("icnreee");

            if (game_dimension == "8x6")
            {
                type_of_8x6.SetActive(true);
            }
            else if (game_dimension == "12x8")
            {
                type_of_12x8.SetActive(true);
            }
            else if (game_dimension == "16x9")
            {
                type_of_16x9.SetActive(true);
            }


            scorePanel.SetActive(false);
            startPanel.SetActive(true);

        }



    }
