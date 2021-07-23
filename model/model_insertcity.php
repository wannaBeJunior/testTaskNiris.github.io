<?php

class model_insertCity extends Model
{

	public function setCity($cityName)
	{
		$cityName = trim(strip_tags($cityName)); // Удалим все html и php теги из строки и пробелы по краям

		$label = "Упс...Что-то пошло не так!";

		if(preg_match("/^[a-zA-Z ]+$/", $cityName))// Проверим введённое значение на наличие только печатных символов и пробелов 
		{
			
			try
			{
				$stmt = $this->pdo->prepare('INSERT INTO cities(cityName) VALUES (:cityName)');// Подготовим запрос
				$stmt->bindParam(':cityName', $cityName);
				if(!$stmt->execute())
				{
					throw new Exception();
				}else
				{
					$label = "Город успешно добавлен!";
					$message = "Можете вернуться на главную страницу";
				}
			}catch(Exception $e)
			{
				if($stmt->errorCode() == 23000)//Получим код ошибки (23000 - ошибка дублирования)
				{
					$message = "Такой город уже есть!";
				}else
				{
					$message = "Ошибка записи в БД";
				}
			}
		}else
		{
			$message = "Недопустимое значение";
		}
		return array(
			'label' => $label,
			'message' => $message
		);
	}
}