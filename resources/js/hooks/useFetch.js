import { useState, useEffect } from 'react';
import axios from 'axios';
import { result } from 'lodash';

axios.defaults.baseURL = `${process.env.MIX_API_HOSTNAME}`;

const DEFAULT_OPTIONS = { 
    'Access-Control-Allow-Origin': '*',
    'Content-Type' : 'application/json',
    'Accept' : 'application/json' 
}

const CancelToken = axios.CancelToken;
const source = CancelToken.source();


/**
 fixed :
  - no need to JSON.stringify to then immediatly do a JSON.parse
  - don't use export defaults, because default imports are hard to search for
  - axios already support generic request in one parameter, no need to call specialized ones
**/
export const useFetch = (axiosParams) => {
    const [response, setResponse] = useState(undefined);
    const [error, setError] = useState('');
    const [isLoading, setLoading] = useState(true);

    const fetchData = async (params) => {
      try {
       const result = await axios.request({...params,...DEFAULT_OPTIONS,CancelToken : source.token});
            setResponse(result.data);
       } catch( error ) {
            setError(error.response);
       } finally {
            setLoading(false);
       }
    };

    useEffect(() => {
        fetchData(axiosParams);

        return () => {
            // here we cancel preveous http request that did not complete yet
            source.cancel(
            `Cancelled request on ${axiosParams.url}`
            );
        };
    }, [axiosParams.url]); // execute once only

    return { response, error, isLoading };
};