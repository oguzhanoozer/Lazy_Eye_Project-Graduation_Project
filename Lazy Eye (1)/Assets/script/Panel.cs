using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Panel : MonoBehaviour
{
    public Text text;
    public GameObject create;
    public GameObject normal;
    public GameObject panel;
    public string username;
    // Start is called before the first frame update
    void Start()
    {
        username = LoginChecker.username;
        text.text = "Username: "+username;
    }

    public void goMenu()
    {
        panel.SetActive(true);
        normal.SetActive(false);
    }
  
    public void goCreate()
    {
        create.SetActive(true);
        panel.SetActive(false);

    }
    public void goNormal()
    {
        normal.SetActive(true);
        panel.SetActive(false);
    }

}
