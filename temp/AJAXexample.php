<?php

//Это образец, который вы можете изменить в соответствии с вашими потребностями

public function actionSample()
{
if (Yii::$app->request->isAjax) {
    $data = Yii::$app->request->post();
    $searchname= explode(":", $data['searchname']);
    $searchby= explode(":", $data['searchby']);
    $searchname= $searchname[0];
    $searchby= $searchby[0];
    $search = // your logic;
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    return [
        'search' => $search,
        'code' => 100,
    ];
  }
}

//Если это произойдет, вы получите данные в блоке успеха Ajax. См. Консоль браузера.

  $.ajax({
       url: '<?php echo Yii::$app->request->baseUrl. '/supermarkets/sample' ?>',
       type: 'post',
       data: {
                 searchname: $("#searchname").val() , 
                 searchby:$("#searchby").val() , 
                 _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
             },
       success: function (data) {
          console.log(data.search);
       }
  });

