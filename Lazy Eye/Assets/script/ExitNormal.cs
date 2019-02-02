using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ExitNormal : MonoBehaviour
{
    public GameObject score;
    public GameObject start;
    public GameObject mymenu;
    public GameObject gomenu;
   

    public void goMenu()
    {
        score.SetActive(false);
        start.SetActive(true);
        mymenu.SetActive(false);
        gomenu.SetActive(true);
    }
}
