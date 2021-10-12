import { useEffect, useState } from 'react'

const DEFAUL_OPTIONS = { 
    'Content-Type' : 'application/json',
    'Accept' : 'application/json' 
}

const CancelToken = axios.CancelToken;
const source = CancelToken.source();

export default function useFetch(method, url, body = null, options = {}) {

    const [response,setResponse] = useState(null)
    const [isLoading,setLoading] = useState(true)
    const [error,setError] = useState(null)
    
    useEffect(()=> {
        console.log(`Render Once ${process.env.MIX_API_HOSTNAME}`);
        setTimeout(() => {
            axios({
                method : 'get',
                url : url,
                data : null,
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    ...options
                },
                CancelToken : source.token
            })
            .then(res => {
                console.log(res);
                setResponse(res)
                setLoading(false)
                setError(null)
                console.log(response,isLoading,error);
            })
            .catch(err => {
                if (axios.isCancel(err)) {
                    console.log(err);
                }
    
                setResponse(null)
                setLoading(false)
                setError(err.response)
                console.log(err.message);
            })
        }, 2000);


        return () => {
            // here we cancel preveous http request that did not complete yet
            source.cancel(
            `Cancelled request on ${url}`
            );
        };
    }, [url])

    return { response, isLoading, error }
}
