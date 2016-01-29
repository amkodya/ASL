<?php

class Food_model extends CI_Model {

    function addFood($name, $expiration, $price, $cal, $fats, $protein, $quantity, $category) {
        $data = array(
            'name' => $name,
            'expiration' => $expiration,
            'price' => $price,
            'cal' => $cal,
            'fats' => $fats,
            'protein' => $protein,
            'quantity' => $quantity,
            'category' => $category
        );

        $this->db->insert('foods', $data);
    }

    function getFoods() {
        $query = $this->db->get('foods');
        $foods = array();

        foreach ($query->result() as $row) {
            $foods[] = array(
                'foodid' => $row->foodid,
                'name' => $row->name,
                'expiration' => $row->expiration,
                'price' => $row->price,
                'cal' => $row->cal,
                'fats' => $row->fats,
                'protein' => $row->protein,
                'quantity' => $row->quantity,
                'category' => $row->category
            );
        }

        return $foods;
    }

    function deleteFood($name) {
        $this->db->where('name', $name);
        $this->db->delete('foods');
    }

    function makeGroc() {
        $query = $this->db->get('foods');
        $foods = array();

        foreach ($query->result() as $row) {
            $foods[] = array(
                'name' => $row->name,
                'price' => $row->price
            );
        }
    }

    function makeNutrition() {
        $query = $this->db->get('foods');
        $foods = array();

        foreach ($query->result() as $row) {
            $foods[] = array(
                'name' => $row->name,
                'cal' => $row->cal,
                'fats' => $row->fats,
                'protein' => $row->protein
            );
        }
    }

}